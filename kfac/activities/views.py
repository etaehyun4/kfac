# -*- coding: utf-8-*-

from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render_to_response
from django.template import RequestContext, Context
from activities.models import Activity

def view(request, act_num):
    activities = Activity.objects.all().order_by('order')
    act_num = int(act_num)
    if len(activities) <= act_num:
        return HttpResponseRedirect('/activities/edit/')

    activity = activities[act_num]
    return render_to_response('activities/view.html',{
        'menu':'activities',
        'submenu':activity.name,
        'activities':activities,
        'filename':activity.img.name,
    }, context_instance=RequestContext(request))

def edit(request):
    activities = Activity.objects.all().order_by('order')
    return render_to_response('activities/edit.html',{
        'menu':'activities',
        'submenu':'edit',
        'activities':activities,
    }, context_instance=RequestContext(request))

def add(request):
    name = request.POST.get('name','')
    img = request.FILES.get('image','')
    order = len(Activity.objects.all())

    img.name = name + '.' + img.name.split('.')[-1]
    activity = Activity(name=name,order=order,img=img)
    activity.save()

    return HttpResponseRedirect('/activities/edit/')
