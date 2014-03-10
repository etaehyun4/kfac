# -*- coding: utf-8-*-

from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from only.models import Board, Article

def board(request, board_num):
    boards = Board.objects.all().order_by('order')
    board_num = int(board_num)


    #board= boards[board_num]
    return render_to_response('only/board.html',{
        'menu':'only',
    }, context_instance=RequestContext(request))
