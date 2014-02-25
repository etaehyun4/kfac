# Create your views here.
# -*- coding: utf-8

from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django import template

template.add_to_builtins('django.templatetags.i18n')

def greetings(request):
    return render_to_response('about/greetings.html',{
        'menu':'about',
        'submenu':'greetings',
    }, context_instance=RequestContext(request))

def vision(request):
    return render_to_response('about/vision.html',{
        'menu':'about',
        'submenu':'vision',
    }, context_instance=RequestContext(request))

def organization(request):
    return render_to_response('about/organization.html',{
        'menu':'about',
        'submenu':'organization',
    }, context_instance=RequestContext(request))

def achievements(request):
    return render_to_response('about/achievements.html',{
        'menu':'about',
        'submenu':'achievements',
    }, context_instance=RequestContext(request))
