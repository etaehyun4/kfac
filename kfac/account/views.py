# -*- coding: utf-8-*-

from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django.utils import simplejson as json
from django.http import HttpResponse, HttpResponseRedirect
from account.models import UserProfile

def _login(request):
    if request.method == 'POST':
        user_id = request.POST['mb_id']
        password = request.POST['mb_password']
        try:
            user = authenticate(username=user_id, password=password)
        except UnicodeEncodeError:
            return HttpResponseBadRequest('Bad Request')
        if user is None: # Login Failed
            return render_to_response('account/login_window.html',{
                'message':'존재하지 않는 아이디 혹은 잘못된 비밀번호입니다.',
            }, context_instance=RequestContext(request))
        else: # Login OK
            login(request, user)
            return render_to_response('refresh.html',{
            }, context_instance=RequestContext(request))
    else:
        return render_to_response('account/login.html',{
        }, context_instance=RequestContext(request))

def _logout(request):
    logout(request)
    return HttpResponseRedirect('/')

def _login_window(request):
    return render_to_response('account/login_window.html',{
    }, context_instance=RequestContext(request))

def join(request):
    return render_to_response('account/join.html',{
    }, context_instance=RequestContext(request))

def join_success(request):
    name = request.GET.get('name','')
    user_id = request.GET.get('id','')
    return render_to_response('account/join_success.html',{
        'name':name,
        'id':user_id,
    }, context_instance=RequestContext(request))

def join_form(request):
    if request.method == 'POST':
        user_id = request.POST.get('mb_id','')
        password = request.POST.get('mb_password','')
        question = int(request.POST.get('mb_password_q','0'))
        answer = request.POST.get('mb_password_a','')
        name = request.POST.get('mb_name','')
        nick = request.POST.get('mb_nick','')
        email = request.POST.get('mb_email','')
        birth = request.POST.get('mb_birth','')
        sex = request.POST.get('mb_sex','')
        phone = request.POST.get('mb_hp','')
        profile_text = request.POST.get('mb_profile','')
        is_mailing = request.POST.get('mb_mailing','')
        is_sms = request.POST.get('mb_sms','')
        is_open = request.POST.get('mb_open','')

        user = User.objects.create_user(username=user_id, password=password, email=email)
        profile = UserProfile(
                user=user,
                question=question,
                answer=answer,
                name=name,
                nick=nick,
                birth=birth,
                sex=sex,
                phone=phone,
                text=profile_text,
                mailing=(len(is_mailing)>0),
                sms=(len(is_sms)>0),
                info_open=(len(is_open)>0)
                )
        profile.save()
        return HttpResponseRedirect('/account/join_success/?name='+name+'&id='+user_id)
    else:
        return render_to_response('account/join_form.html',{
        }, context_instance=RequestContext(request))

def join_id_check(request):
    user_id = request.GET.get('id','')
    user = User.objects.filter(username=user_id)
    return HttpResponse(len(user))

def mypage(request):
    user = User.objects.get(username=request.user)
    profile = user.userprofile
    if request.method == 'POST':
        profile.question = int(request.POST.get('mb_password_q','0'))
        profile.answer = request.POST.get('mb_password_a','')
        profile.name = request.POST.get('mb_name','')
        profile.nick = request.POST.get('mb_nick','')
        user.email = request.POST.get('mb_email','')
        profile.birth = request.POST.get('mb_birth','')
        profile.sex = request.POST.get('mb_sex','')
        profile.phone = request.POST.get('mb_hp','')
        profile.text = request.POST.get('mb_profile','')
        profile.is_mailing = request.POST.get('mb_mailing','')
        profile.is_sms = request.POST.get('mb_sms','')
        profile.is_open = request.POST.get('mb_open','')
        
        user.save();
        profile.save();
        return HttpResponseRedirect('/account/my_info/')
    else:
        return render_to_response('account/mypage.html',{
            'user_id':user.username,
            'question':profile.question,
            'answer':profile.answer,
            'name':profile.name,
            'nick':profile.nick,
            'email':user.email,
            'birth':profile.birth,
            'sex':profile.sex,
            'phone':profile.phone,
            'text':profile.text,
            'mailing':profile.mailing,
            'sms':profile.sms,
            'info_open':profile.info_open,
        }, context_instance=RequestContext(request))

def password_check(request):
    password = request.GET.get('password','')
    user = User.objects.get(username=request.user)
    check = user.check_password(password)
    return HttpResponse(json.dumps(check, indent=4, ensure_ascii=False))
