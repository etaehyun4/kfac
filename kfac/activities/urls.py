from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/activities/view/1/')),
    (ur'^view/(\d+)/', 'activities.views.view'),
)
