from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', 'only.views.index'),
    (ur'^board/(\d+)/$', 'only.views.board'),
    (ur'^board/(\d+)/write/$', 'only.views.write'),
    (ur'^board/(\d+)/read/$', 'only.views.read'),
    (ur'^board/(\d+)/delete/$', 'only.views.delete'),
)
