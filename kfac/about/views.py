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
    group_last = None
    if Group.objects.count() != 0:
        group_last = groups[Group.objects.count()-1]
        groups = groups[:Group.objects.count()-1]
    return render_to_response('about/achievements.html',{
        'menu':'about',
        'submenu':'achievements',
        'groups':groups,
        'group_last':group_last,
    }, context_instance=RequestContext(request))

def edit_achievements(request):
    if not request.user.is_superuser:
        return HttpResponseRedirect('/')
    groups = Group.objects.all()
    return render_to_response('about/edit.html',{
        'menu':'about',
        'groups':groups,
    }, context_instance=RequestContext(request))

def edit(request):
    groups = Group.objects.all()
    for g in groups:
        name = request.POST.get(g.name+'_name','')
        text_left = request.POST.get(g.name+'_text_left','')
        text_right = request.POST.get(g.name+'_text_right','')
        g.name = name
        g.text_left = text_left
        g.text_right = text_right
        g.save()
    return HttpResponseRedirect('/about/achievements')

def add_achievements(request):
    if not request.user.is_superuser:
        return HttpResponseRedirect('/')
    return render_to_response('about/add.html',{
        'menu':'about',
    }, context_instance=RequestContext(request))

def add(request):
    name = request.POST.get('name','')
    text_left = request.POST.get('text_left','')
    text_right = request.POST.get('text_right','')
    g = Group(name=name,text_left=text_left,text_right=text_right)
    g.save()
    return HttpResponseRedirect('/about/achievements')

