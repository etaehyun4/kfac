# -*- coding: utf-8 -*-

from django.shortcuts import render_to_response
from models import *
from django.template import RequestContext, Context

# Create your views here.
def view(request):
    members = Member.objects.all().order_by('-generation', 'kor_name')
    all = []
    for member in members:
        if len(all) == 0 or all[-1]['num'] != member.generation:
            item = {}
            item['num'] = member.generation
            item['word'] = 'th'
            if item['num']%100 == 11 or item['num']%100 == 12 or item['num']%100 == 13:
                pass
            elif item['num']%10 == 1:
                item['word'] = 'st'
            elif item['num']%10 == 2:
                item['word'] = 'nd'
            elif item['num']%10 == 3:
                item['word'] = 'rd'
            item['member'] = []
            all.append(item)
        all[-1]['member'].append(member)

    return render_to_response('people/people.html', {
        'all': all}, context_instance=RequestContext(request))
