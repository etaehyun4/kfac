# Create your views here.
# -*- coding: utf-8

from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django import template
from models import *
from django.http import *
from django.utils import simplejson as json
from django.core.serializers.json import DjangoJSONEncoder
from django.views.decorators.csrf import csrf_exempt

template.add_to_builtins('django.templatetags.i18n')

def require(request):
    return render_to_response('recruiting/require.html',{
        'menu':'recruiting',
        'submenu':'require',
    }, context_instance=RequestContext(request))

def process(request):
    app = Application.objects.all().order_by('-id')
    guide = Guideline.objects.all().order_by('-id')
    
    app_result = True
    guide_result = True
    app_url = ""
    guide_url = ""

    if len(app) == 0:
        app_result = False
    else:
        app_url = app[0].doc.url

    if len(guide) == 0:
        guide_result = False
    else:
        guide_url = guide[0].doc.url

    return render_to_response('recruiting/process.html',{
        'menu':'recruiting',
        'submenu':'process',
        'app_result':app_result,
        'guide_result':guide_result,
        'app_url': app_url,
        'guide_url': guide_url,
    }, context_instance=RequestContext(request))

@csrf_exempt
def faq_list(request):
    questions = Question.objects.all().order_by('-id')
    all = []
    for q in questions:
        item = {}
        item['id']=q.id
        item['question']=q.question
        print q.writer
        item['writer']=str(q.writer)
        item['date']="%02d-%02d"%(q.date.month, q.date.day)
        item['answer']=q.answer
        all.append(item)

    return HttpResponse(json.dumps(
        all, ensure_ascii=False, indent=4, cls=DjangoJSONEncoder))

def faq(request):
    return render_to_response('recruiting/faq.html',{
        'menu':'recruiting',
        'submenu':'faq',
    }, context_instance=RequestContext(request))
