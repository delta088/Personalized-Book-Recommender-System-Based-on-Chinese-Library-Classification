#-*-coding:utf-8-*-
#功能：位置匹配

import MySQLdb
import math
import sys
import re



def main():  					 #将核对出的最高级标签存入数据库  
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()	
								#插入上下位关系表中的每一个tag
	check_tag_lists = []
	check_sql = "SELECT tag_name FROM book_area" 
	cursor.execute(check_sql)
	check_tag_list = cursor.fetchall()
	for check_tag in check_tag_list:
		check_tag = "%s" %check_tag
		check_tag_lists.append(str(check_tag))

	n = 0
	book_tag_name = 'R5/Y15'
	length = len(book_tag_name)								#length指每个标签的长度	
	while length > 0:						
		tag = book_tag_name[0:length]  			#长度由高到底依次获取
		for i in range(len(check_tag_lists)):
			if tag == check_tag_lists[i]:
				n = 1
				address_sql = "SELECT address FROM book_area WHERE tag_name = ('%s')" %tag
				cursor.execute(address_sql)
				address = cursor.fetchone()
				print tag
				print address
				break
		if n == 1:
			break
		length = length - 1
	cursor.close()
	conn.close()	

main()