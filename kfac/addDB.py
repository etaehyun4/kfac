# -*- coding: utf-8-*-

from account.models import User, UserProfile
from only.models import Board, Article

def init():
    admin = User.objects.create_user(username="admin", password="admin1234")
    admin.is_staff = True
    admin.is_superuser = True
    admin.save()
    admin_profile = UserProfile(user=admin,name="최고관리자")
    admin_profile.save()

    staff = User.objects.create_user(username="staff", password="staff1234")
    staff.is_staff = True
    staff.save()
    staff_profile = UserProfile(user=staff,name="일반회원")
    staff_profile.save()

    user = User.objects.create_user(username="user", password="user1234")
    user.save()
    profile = UserProfile(user=user,name="비회원")
    profile.save()


    board = Board(name="board", order=0)
    board.save()

    for i in range(45):
        article = Article(
                author=staff_profile,
                title='title'+str(i), 
                board=board,
                contents='contents',
                notice=False,
                read=0)
        article.save()
