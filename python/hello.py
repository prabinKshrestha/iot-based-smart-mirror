hello = {3:1,'b':2}
for i in range(10):
    print(hello[3])
    print(hello['b'])
    hello[3] += 1
    hello['b'] += 2

hello['c']=213

print (hello)