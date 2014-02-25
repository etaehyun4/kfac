from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/recruiting/requirements/')),
    (ur'^requirements/', 'recruiting.views.require'),
    (ur'^process/', 'recruiting.views.process'),
    (ur'^faq/', 'recruiting.views.faq'),
)
