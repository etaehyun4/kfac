from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', lambda request: HttpResponseRedirect('/only/board/0/')),
    (ur'^board/(\d+)/$', 'only.views.board'),
)
