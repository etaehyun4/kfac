# Create your views here.

from django.template import RequestContext
from django.shortcuts import render
from django import template
from django.core.exceptions import ValidationError
from models import Activity

template.add_to_builtins('django.templatetags.i18n')

def view(request, act_num):
    activity = None
    try:
        activity = Activity.objects.get(order=int(act_num))
    except:
        raise ValidationError('Corresponding activity does not exist')
    ctx = {'title':activity.name, 'filename':activity.filename}
    return render(request, 'activities/view.html', ctx)

def add(request):
    if request.method == 'GET':
        return render(request, 'view.html', {'title':Activity.objects.get(order=1)})
    else:
        title = str(request.POST.get('title','Untitled Activity'))
        new_image = request.POST.get('upload',None)
        a = Activity(name=title, order=Activity.objects.all().count()+1, new_image.name)
        a.save()
        ctx = {'title':title, 'filename':filename}
        return render(request, 'activities/view.html', ctx)

def delete(request):
    pass

def reorder(request):
    pass
