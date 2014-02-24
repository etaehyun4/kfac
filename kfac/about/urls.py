from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/about/greetings/')),
    (ur'^greetings/', 'about.views.greetings'),
    (ur'^vision/', 'about.views.vision'),
    (ur'^organization/', 'about.views.organization'),
    (ur'^achievements/', 'about.views.achievements'),
)