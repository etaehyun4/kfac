# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render
from django import template

template.add_to_builtins('django.templatetags.i18n')

def require(request):
    return render(request,'recruiting/require.html')

def process(request):
    return render(request,'recruiting/process.html')

def faq(request):
    return render(request,'recruiting/faq.html')
