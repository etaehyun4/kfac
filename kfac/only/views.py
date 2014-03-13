# -*- coding: utf-8-*-

from django.contrib.auth.models import User
from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from only.models import Board, Article, ArticleFile

def index(request):
    boards = Board.objects.all().order_by('order')
    if len(boards)<1:
        return HttpResponseRedirect('/')
    board = boards[0]
    return HttpResponseRedirect('/only/board/'+str(board.order))

def board(request, board_num):
    boards = Board.objects.all().order_by('order')
    order = int(board_num)
    board = Board.objects.filter(order=order)
    if len(board)<1:
        return HttpResponseRedirect('/')
    board = board[0]

    return render_to_response('only/board.html',{
        'menu':'only',
        'submenu':board.name,
        'boards':boards,
        'articles':board.article_set.all().order_by('-created'),
        'board_num':board_num,
        'page_num':1,
    }, context_instance=RequestContext(request))

def write(request, board_num):
    if request.method == 'POST':
        user = User.objects.get(username=request.user)
        author = user.userprofile
        title = request.POST.get('title','')
        order = int(board_num)
        board = Board.objects.get(order=order)
        contents = request.POST.get('editor','')
        notice = len(request.POST.get('notice',''))>0

        article = Article(
                author=author,
                title=title,
                board=board,
                contents=contents,
                notice=notice)
        article.save()

        file_num = int(request.POST.get('file_num',''))
        for i in range(file_num):
            upload_file = request.FILES.get('file'+str(i+1), None)
            if upload_file:
                article_file = ArticleFile(upload_file=upload_file,article=article)
                article_file.save()

        return HttpResponseRedirect('/only/board/'+board_num+'/read/?article_num='+str(article.id))
    else:
        article_num = int(request.GET.get('article_num','0'))
        boards = Board.objects.all().order_by('order')
        board_num = int(board_num)
        result_dic = {}
        if article_num>0:
            article = Article.objects.get(id=article_num)
            result_dic.update({'article':article})
        if len(boards) <= board_num:
            return HttpResponseRedirect('/')

        board = boards[board_num]
        result_dic.update({
            'menu':'only',
            'submenu':board.name,
            'boards':boards,
            'board_num':board_num,
        })
        return render_to_response('only/write.html', result_dic, context_instance=RequestContext(request))

def read(request, board_num):
    boards = Board.objects.all().order_by('order')
    board_num = int(board_num)
    if len(boards) <= board_num:
        return HttpResponseRedirect('/')

    article_num = request.GET.get('article_num','')
    article = Article.objects.get(id=int(article_num))
    article.read = article.read + 1
    article.save()

    board = boards[board_num]
    return render_to_response('only/read.html',{
        'menu':'only',
        'submenu':board.name,
        'boards':boards,
        'board_num':board_num,
        'article':article,
    }, context_instance=RequestContext(request))

def delete(request, board_num):
    article_id = int(request.GET.get('article_id',''))
    article = Article.objects.get(id=article_id)
    article.delete()

    return HttpResponse(0);
