# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from only.models import Board, Article

def home(request):
    b = Board.objects.get(name='board')
    a = Article.objects.all().order_by('-id').filter(board=b)
    if a.count() >= 4:
        ret = a[0:4]
    else:
        ret = a
    return render_to_response('main/main.html',{
        'menu':'main',
        'articles':ret,
        'board':b,
    }, context_instance=RequestContext(request))
