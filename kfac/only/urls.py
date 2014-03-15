from django.conf.urls import patterns, include, url
from django.http import *
from django.contrib import admin

urlpatterns = patterns('',
    (ur'^$', 'only.views.index'),
    (ur'^board/(\d+)/$', 'only.views.board'),
    (ur'^board/(\d+)/write/$', 'only.views.write'),
    (ur'^board/(\d+)/edit/$', 'only.views.edit'),
    (ur'^board/(\d+)/read/$', 'only.views.read'),
    (ur'^board/(\d+)/delete/$', 'only.views.delete'),
    (ur'^board/(\d+)/file_delete/$', 'only.views.file_delete'),
    (ur'^board/(\d+)/add_comment/$', 'only.views.add_comment'),
    (ur'^board/(\d+)/del_comment/$', 'only.views.del_comment'),
    (ur'^board/(\d+)/show_articles/$', 'only.views.show_articles'),
)
