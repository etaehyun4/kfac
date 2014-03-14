# -*- coding: utf-8-*-

from account.models import User, UserProfile
from only.models import Board, Article

def init():
    user = User.objects.create_user(username="admin", password="admin1234")
    user.is_staff = True
    user.is_superuser = True
    user.save()

    profile = UserProfile(user=user,name="최고관리자")
    profile.save()

    board = Board(name="board", order=0)
    board.save()

    for i in range(45):
        article = Article(
                author=profile,
                title='title'+str(i), 
                board=board,
                contents='contents',
                notice=False,
                read=0)
        article.save()
