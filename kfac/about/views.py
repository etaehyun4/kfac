# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render
from django import template

template.add_to_builtins('django.templatetags.i18n')

def greetings(request):
    return render(request,'about/greetings.html')

def vision(request):
    return render(request,'about/vision.html')

def organization(request):
    return render(request,'about/organization.html')

def achievements(request):
    return render(request,'about/achievements.html')
