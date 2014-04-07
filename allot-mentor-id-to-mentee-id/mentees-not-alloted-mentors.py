import csv

notalloted = range(1, 844)

with open('allotment_indexes.csv') as f:
    reader = csv.reader(f, delimiter=";")
    reader.next() # to skip to the second row as the first row is the header row
    for row in reader:
        try:
            notalloted.remove(int(row[0]))

        except ValueError:

            continue

print notalloted

filin = open("allotment_indexes.csv", "a")

for i in notalloted:

    filin.write(str(i) + delim + "0" + "\n")

filin.close()    
