from django.db import models

# Create your models here.


class Group(models.Model):
    name = models.CharField(max_length=50)

class Contents(models.Model):
    name = models.CharField(max_length=50)
    group = models.ForeignKey('Group')
