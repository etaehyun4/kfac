# Create your views here.
# -*- coding: utf-8

from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django import template

template.add_to_builtins('django.templatetags.i18n')

def require(request):
    return render_to_response('recruiting/require.html',{
        'menu':'recruiting',
        'submenu':'require',
    }, context_instance=RequestContext(request))

def process(request):
    return render_to_response('recruiting/process.html',{
        'menu':'recruiting',
        'submenu':'process',
    }, context_instance=RequestContext(request))

def faq(request):
    return render_to_response('recruiting/faq.html',{
        'menu':'recruiting',
        'submenu':'faq',
    }, context_instance=RequestContext(request))
