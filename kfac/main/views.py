# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render_to_response
from django.template import RequestContext, Context

def home(request):
    return render_to_response('main/main.html',{
        'menu':'main',
    }, context_instance=RequestContext(request))
