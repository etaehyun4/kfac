# -*- coding: utf-8 -*-

from django.shortcuts import render_to_response
from models import *
from django.template import RequestContext, Context
from django.http import *
from django.utils import simplejson as json
from django.core.serializers.json import DjangoJSONEncoder
from django.views.decorators.csrf import csrf_exempt

# Create your views here.
def view(request):
    return render_to_response('people/people.html', {
            'menu':'people',
        }, context_instance=RequestContext(request))

@csrf_exempt
def getList(request):
    members = Member.objects.all().order_by('-generation', 'kor_name')
    all = []
    for member in members:
        if len(all) == 0 or all[-1]['num'] != member.generation:
            item = {}
            item['num'] = member.generation
            word = 'th'
            if item['num']%100 == 11 or item['num']%100 == 12 or item['num']%100 == 13:
                pass
            elif item['num']%10 == 1:
                word = 'st'
            elif item['num']%10 == 2:
                word = 'nd'
            elif item['num']%10 == 3:
                word = 'rd'
            item['word']=str(item['num'])+word
            item['member'] = []
            all.append(item)

        item = {}
        item['picture']=member.picture.url
        item['kor_name']=member.kor_name
        item['eng_name']=member.eng_name
        item['position']=member.position
        item['major']=member.major
        item['status']=member.status
        item['id']=member.id
        all[-1]['member'].append(item)

    return HttpResponse(json.dumps(
        all, ensure_ascii=False, indent=4, cls=DjangoJSONEncoder))

Month = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

def date_str(date):
    return Month[date.month]+"."+"%02d"%(date.day)

@csrf_exempt
def profile(request):
    id = int(request.POST.get('id', -1))
    member = Member.objects.filter(id = id)
    edu = []
    education = Education.objects.filter(user = member).order_by('-start')
    for e in education:
        item = {}
        item['start'] = date_str(e.start)
        if e.to_present:
            item['end'] = 'Present'
        else:
            item['end'] = date_str(e.end)
        item['text'] = e.text
        edu.append(item)

    work = []
    works = Work.objects.filter(user = member).order_by('-start')
    for w in works:
        item = {}
        item['start'] = date_str(w.start)
        if w.to_present:
            item['end'] = 'Present'
        else:
            item['end'] = date_str(w.end)
        item['text'] = w.text
        work.append(item)

    return HttpResponse(json.dumps(
        {'edu': edu, 'work':work}, ensure_ascii=False, indent=4, cls=DjangoJSONEncoder))
