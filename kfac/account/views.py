# -*- coding: utf-8-*-

from django.contrib.auth import authenticate, login, logout
from django.shortcuts import render_to_response
from django.template import RequestContext, Context

def _login(request):
    '''
    if request.method == 'POST':
        user_id = request.POST['id']
        password = request.POST['password']
        try:
            user = authenticate(username=user_id, password=password)
        except UnicodeEncodeError:
            return HttpResponseBadRequest('Bad Request')
        if user is None: # Login Failed
            return render_to_response('accounts/login.html',{
                'message':'존재하지 않는 아이디 혹은 잘못된 비밀번호입니다.',
            }, context_instance=RequestContext(request))
        else: # Login OK
            if user.userprofile.active:
                login(request, user)
                return HttpResponseRedirect(next_url)
            else:
                return render_to_response('accounts/login.html',{
                    'message':'메일을 통한 인증이 필요한 회원입니다.',
                }, context_instance=RequestContext(request))
        return 
    else:
        return render_to_response('accounts/login.html',{
            'section':'login',
        }, context_instance=RequestContext(request))
    '''
    return render_to_response('account/login.html',{
    }, context_instance=RequestContext(request))

def _login_window(request):
    return render_to_response('account/login_window.html',{
    }, context_instance=RequestContext(request))

def join(request):
    return render_to_response('account/join.html',{
    }, context_instance=RequestContext(request))
