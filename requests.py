import httplib2
 

 
httpclient=None 
r = httplib2.HTTPConnection('www.xxx.org',80)
httpclient.request('GET','/CloudBean/capture.php?name=liu&pass=wew')
res=httpclient.getresponse() 
print res.status  
print res.reason  
print res.read()