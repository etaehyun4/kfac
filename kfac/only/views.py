# -*- coding: utf-8-*-

from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from only.models import Board, Article

def board(request, board_num):
    boards = Board.objects.all().order_by('order')
    board_num = int(board_num)
    if len(boards) <= board_num:
        return HttpResponseRedirect('/')

    board = boards[board_num]
    return render_to_response('only/board.html',{
        'menu':'only',
        'submenu':board.name,
        'boards':boards,
        'articles':board.article_set.all(),
        'board_num':board_num,
    }, context_instance=RequestContext(request))

def write(request, board_num):
    if request.method == 'POST':
        textarea = request.POST.get('editor','')
        return HttpResponse(len(user))
    else:
        boards = Board.objects.all().order_by('order')
        board_num = int(board_num)
        if len(boards) <= board_num:
            return HttpResponseRedirect('/')

        board = boards[board_num]
        return render_to_response('only/write.html',{
            'menu':'only',
            'submenu':board.name,
            'boards':boards,
            'board_num':board_num,
        }, context_instance=RequestContext(request))
