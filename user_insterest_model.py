#-*-coding:utf-8-*-
#功能：建立用户兴趣模型
#注：此文件中有两个可变变量再次说明以作调试 35行最高级权重值和73行选择值
import MySQLdb
import sys
from sys import argv
 
def main():
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()
	# user_names = open("python_php.txt","r")
	# user_id = int(user_names.readline())
	#print user_id

	script,user_id = argv
	user_id = int(user_id)
	#print user_id
	#raw_input()  #请以这句话运行 python ex13.py 

	# user_active_sql = "SELECT 读者编号 FROM 读者信息表_测试专用"
	# cursor.execute(user_active_sql)
	# user_id_list = cursor.fetchall()
	# user_id_lists = user_id_list
	# for user_id_tuple2 in user_id_lists:
	# 	user_id2 = '%d' %user_id_tuple2
	# 	user_id2 = int(user_id2)		
	delete_sql = "DELETE FROM 用户兴趣模型表_测试专用 WHERE 读者编号 = '%d'" %user_id
	cursor.execute(delete_sql)
	conn.commit()

	# for user_id_tuple in user_id_list:
	# 	user_id = '%d' %user_id_tuple
	# 	user_id = int(user_id) 

	tagid_first = {}
	tagid_second = {}
	tagid = {}
	user_bookid_sql = "SELECT 图书编号 FROM 用户行为表_测试专用 WHERE 读者编号 = '%d'" %user_id
	cursor.execute(user_bookid_sql)
	user_bookid_list = cursor.fetchall()
	for user_bookid_tuple in user_bookid_list:
		user_bookid = '%s' %user_bookid_tuple
		user_bookid = user_bookid.encode("utf-8")
		first_tgdid_sql = "SELECT 最高级标签,上一级标签,上一级标签权重 FROM 上下位关系表 WHERE 图书编号 = '%s'" %user_bookid  #获取最高级标签
		cursor.execute(first_tgdid_sql)
		first_tagid_list = cursor.fetchall()
		for first_tagid_tuple in first_tagid_list:
			first_tagid = '%s' %first_tagid_tuple[0]
			second_tagid = '%s' %first_tagid_tuple[1]
			degree_second = '%s' %first_tagid_tuple[2]
			first_tagid = first_tagid.encode("utf-8")
			second_tagid = second_tagid.encode("utf-8")
			degree_second = float(degree_second)
			degree = 0.250
			degree_first = 0.8           #最高级权重为0.8

			# second_tgdid_sql = "SELECT 上一级标签 FROM 上下位关系表 WHERE 图书编号 = '%s'" %user_bookid  #获取上一级标签
			# cursor.execute(second_tgdid_sql)
			# second_tagid_list = cursor.fetchall()
			# for second_tagid_tuple in second_tagid_list:
			# 	second_tagid = '%s' %second_tagid_tuple
			# 	second_tagid = second_tagid.encode("utf-8")

			# degree_second_sql = "SELECT 上一级标签权重 FROM 上下位关系表 WHERE 图书编号 = '%s'" %user_bookid  #获取上一级权重
			# cursor.execute(degree_second_sql)
			# degree_second_list = cursor.fetchall()
			# for degree_second_tuple in degree_second_list:
			# 	degree_second = '%s' %degree_second_tuple
			# 	degree_second = float(degree_second)

			# degree_sql = "SELECT 所占权重 FROM 用户行为表_测试专用 WHERE (读者编号,图书编号) = ('%d','%s')" %(user_id,user_bookid) #添加反馈模型权重
			# cursor.execute(degree_sql)
			# degree_list = cursor.fetchone()
			# for degree_float in degree_list:
			# 	degree = '%f' %degree_float  
			# 	degree = float(degree) 

			insert_degree_first = degree_first * degree        #计算添加反馈模型后的最高级标签权重
			insert_degree_second = degree_second * degree      #计算添加反馈模型后的上一级标签权重

			tagid_degree_first = {first_tagid:insert_degree_first}   #去除最高级标签中的重复值
			from collections import Counter
			X,Y = Counter(tagid_first), Counter(tagid_degree_first)
			tagid_first = dict(X+Y)

			tagid_degree_second = {second_tagid:insert_degree_second} #去除上一级标签中的重复值
			from collections import Counter
			A,B = Counter(tagid_second), Counter(tagid_degree_second)
			tagid_second= dict(A+B)

	from collections import Counter                       #将最高级和上一级标签字典合并
	A,B = Counter(tagid_first), Counter(tagid_second)
	tagid = dict(A+B)
	tagid = sorted(tagid.iteritems(), key=lambda d:d[1], reverse = True)[0:5]  #将合并后的字典从大到小排序取前K个值
	for n in range(len(tagid)):
		tag = tagid[n][0]
		degree = tagid[n][1]
		#print user_id,tag,degree
		insert_sql = "INSERT INTO 用户兴趣模型表_测试专用(读者编号,标签编号,标签权重) VALUES ('%d','%s','%f')" %(user_id,tag,degree)
		cursor.execute(insert_sql)
		conn.commit()

	cursor.close()
	conn.close()

if __name__ == '__main__':
	main()
