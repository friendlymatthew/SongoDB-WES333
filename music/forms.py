from django import forms
from .models import Song, User, Rating, Album

class UserForm(forms.ModelForm):
    password = forms.CharField(widget=forms.PasswordInput)
    class Meta:
        model = User
        fields = ['username', 'password']

class RatingForm(forms.ModelForm):
    class Meta:
        model = Rating
        fields = ['username']

class AlbumForm(forms.ModelForm):
    class Meta:
        model = Album
        fields = ['artistName','albumTitle']
    