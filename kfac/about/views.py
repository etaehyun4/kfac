# Create your views here.
# -*- coding: utf-8

from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django.http import HttpResponseRedirect
from about.models import *
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
    groups = Group.objects.all()
    return render_to_response('about/achievements.html',{
        'menu':'about',
        'submenu':'achievements',
        'groups':groups,
    }, context_instance=RequestContext(request))

def edit_achievements(request):
#    if not request.user.is_staff:
#        return HttpResponseRedirect('/')
    groups = Group.objects.all()
    return render_to_response('about/edit.html',{
        'menu':'about',
        'groups':groups,
    }, context_instance=RequestContext(request))

def edit(request):
    groups = Group.objects.all()
    for g in groups:
        name = request.POST.get(g.name+'_name','')
        text = request.POST.get(g.name+'_text','')
        g.name = name
        g.text = text
        g.save()
    return HttpResponseRedirect('/about/achievements')
