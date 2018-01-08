#-*-coding:utf-8-*-
#功能：反馈模型的建立
import MySQLdb

def search(recessive_search_degree):     						#隐性反馈中的检索权重
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()

	search_sql = "UPDATE 用户行为表_测试专用 SET 所占权重 = '%f' WHERE 用户行为 = '检索'" %recessive_search_degree
	cursor.execute(search_sql)
	conn.commit()

	cursor.close()
	conn.close()

def click(recessive_click_degree): 							#隐性反馈中的点击权重
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()

	click_sql = "UPDATE 用户行为表_测试专用 SET 所占权重 = '%f' WHERE 用户行为 = '点击'" %recessive_click_degree
	cursor.execute(click_sql)
	conn.commit()
	
	cursor.close()
	conn.close()

def read(recessive_read_degree):							#隐性反馈中的阅读权重
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()

	read_sql = "UPDATE 用户行为表_测试专用 SET 所占权重 = '%f' WHERE 用户行为 = '借书'" %recessive_read_degree
	cursor.execute(read_sql)
	conn.commit()
	
	cursor.close()
	conn.close()

def love(love_degree):							#显性反馈中的喜爱权重
	conn = MySQLdb.connect(host='localhost',user='hao',passwd='123456',db='library',port=3306,charset='utf8')
	cursor = conn.cursor()

	love_sql = "UPDATE 用户行为表_测试专用 SET 所占权重 = '%f' WHERE 用户行为 = '喜爱'" %love_degree
	cursor.execute(love_sql)
	conn.commit()
	
	cursor.close()
	conn.close()

def degree_value():
	global recessive_search_degree 
	global recessive_click_degree
	global recessive_read_degree
	global love_degree
	dominance_value = 0.5                    #显性反馈权值
	recessive_value = 1 - dominance_value	 #隐性反馈权值
	search_degree = 0.1 
	click_degree = 0.4 
	read_degree = 0.5
	recessive_search_degree = recessive_value * search_degree
	recessive_click_degree = recessive_value * click_degree
	recessive_read_degree = recessive_value * read_degree
	love_degree = dominance_value + recessive_read_degree

def main():
	degree_value()
	search(recessive_search_degree)
	click(recessive_click_degree)
	read(recessive_read_degree)
	love(love_degree)

if __name__ == '__main__':
	main()