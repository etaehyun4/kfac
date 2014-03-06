from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/activities/view/0/')),
    (ur'^view/(\d+)/', 'activities.views.view'),
    (ur'^edit/', 'activities.views.edit'),
    (ur'^add/', 'activities.views.add'),
)
