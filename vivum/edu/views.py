from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse

def index(req):
    return HttpResponse("<h1>Login</h1>")
