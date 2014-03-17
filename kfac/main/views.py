# Create your views here.
# -*- coding: utf-8

from django.template import RequestContext
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from only.models import Board, Article, Comment

def home(request):
    b = Board.objects.get(name='board')
    a = Article.objects.all().order_by('-id').filter(board=b)
    ret = []
    if a.count() >= 4:
        for i in range(4):
            ret.append((a[i],Comment.objects.all().filter(article=a[i]).count()))
    else:
        for i in range(a.count()):
            ret.append((a[i],Comment.objects.all().filter(article=a[i]).count()))
    return render_to_response('main/main.html',{
        'menu':'main',
        'articles':ret,
        'board':b,
    }, context_instance=RequestContext(request))
