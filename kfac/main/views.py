# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render
from django import template

template.add_to_builtins('django.templatetags.i18n')

def home(request):
    return render(request,'main/main.html')
