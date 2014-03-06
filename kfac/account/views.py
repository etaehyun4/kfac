# -*- coding: utf-8-*-

from django.contrib.auth.models import User
from django.contrib.auth import authenticate, login, logout
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from django.utils import simplejson as json
from django.http import HttpResponse, HttpResponseRedirect
from account.models import UserProfile
import string, random

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

def id_check(request):
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

def name_email_check(request):
    name = request.GET.get('name','')
    email = request.GET.get('email','')
    user = User.objects.filter(email=email)
    if len(user)<1:
        return HttpResponse(json.dumps(False, indent=4, ensure_ascii=False))
    user = user[0]
    profile = user.userprofile
    if profile.name == name:
        return HttpResponse(json.dumps(True, indent=4, ensure_ascii=False))
    return HttpResponse(json.dumps(False, indent=4, ensure_ascii=False))

def answer_check(request):
    user_id = request.GET.get('user_id','')
    answer = request.GET.get('answer','')
    user = User.objects.get(username=user_id)
    profile = user.userprofile
    return HttpResponse(json.dumps(profile.answer==answer, indent=4, ensure_ascii=False))

def id_password_lost(request):
    if request.method == 'POST':
        user_id = request.POST.get('id','')
        name = request.POST.get('name','')
        email = request.POST.get('email','')
        return HttpResponseRedirect('/account/find_password/?user_id='+user_id+'&name='+name+'&email='+email)
    else:
        return render_to_response('account/id_password_lost.html',{
        }, context_instance=RequestContext(request))

def find_password(request):
    user_id = request.GET.get('user_id','')
    name = request.GET.get('name','')
    email = request.GET.get('email','')
    if len(user_id):
        user = User.objects.get(username=user_id)
    else:
        user = User.objects.filter(email=email)[0]
    profile = user.userprofile
    q = profile.question
    if q==1:
        question = '내가 좋아하는 캐릭터는?'
    elif q==2:
        question = '타인이 모르는 자신만의 신체비밀이 있다면?'
    elif q==3:
        question = '자신의 인생 좌우명은?'
    elif q==4:
        question = '초등학교 때 기억에 남는 짝꿍 이름은?'
    elif q==5:
        question = '유년시절 가장 생각나는 친구 이름은?'
    elif q==6:
        question = '가장 기억에 남는 선생님 성함은?'
    elif q==7:
        question = '친구들에게 공개하지 않은 어릴 적 별명이 있다면?'
    elif q==8:
        question = '다시 태어나면 되고 싶은 것은?'
    elif q==9:
        question = '가장 감명깊게 본 영화는?'
    elif q==10:
        question = '읽은 책 중에서 좋아하는 구절이 있다면?'
    elif q==11:
        question = '기억에 남는 추억의 장소는?'
    elif q==12:
        question = '인상 깊게 읽은 책 이름은?'
    elif q==13:
        question = '자신의 보물 제1호는?'
    elif q==14:
        question = '받았던 선물 중 기억에 남는 독특한 선물은?'
    elif q==15:
        question = '자신이 두번째로 존경하는 인물은?'
    elif q==16:
        question = '아버지의 성함은?'
    elif q==17:
        question = '어머니의 성함은?'
    return render_to_response('account/find_password.html',{
        'question':question,
        'user_id':user_id,
    }, context_instance=RequestContext(request))

def find_password_finish(request):
    user_id = request.GET.get('user_id','')
    user = User.objects.get(username=user_id)
    chars = string.ascii_uppercase + string.ascii_lowercase
    code = ''.join(random.choice(chars) for x in range(10))
    user.set_password(code)
    user.save()
    return render_to_response('account/find_password_finish.html',{
        'user_id':user_id,
        'given_password':code,
    }, context_instance=RequestContext(request))
