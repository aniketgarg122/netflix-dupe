from django.shortcuts import render, HttpResponse
def index(request):
    context = {
        'variable':'this is sent'
    }
    return render(request,'index.html',context)
    #return HttpResponse("this is index page")
def contact(request):
    return render(request,'contact.html')
def about(request):
    return render(request,'about.html')
def services(request):
    return render(request,'services.html')
def login(request):
    return render(request,'login.html')    
# Create your views here.
