# Create your views here.
# -*- coding: utf-8

from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django import template
from models import *

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

def faq(request):
    return render_to_response('recruiting/faq.html',{
        'menu':'recruiting',
        'submenu':'faq',
    }, context_instance=RequestContext(request))
