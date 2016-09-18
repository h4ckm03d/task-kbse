# 1

# 2

Using MVC approach can break down task into smaller responsibilities which matched with each division. The database division can focus on Model part, UI division focus on View part, then the programmer focus on controller part and combine M V C parts.

# 3

The best solution to prevent data loss is use soft delete approach. Like laravel approach, for each table added one column `deleted_at` which contained timestamp when the data deleted.

# 4

The possible approach is using ORM to better switching database or use two database engine. For third possibilities, can be use Key value store approach.

# 5
```SELECT id, name FROM users WHERE user = '{$user}' AND password = '{$password}';```
The script for query id and name from table users with variable user and password

```SELECT id, name FROM users WHERE user = 'Fred' AND password = '1234';```
The script for query id and name from table users with static user and password

```SELECT id, name FROM users WHERE user = 'Fred' AND password = '1234' OR '1' = '1';```
The script for query but with sql injection pattern, the result will return all data

The script above cannot be used for optimize data search because those script still need index for column user and password to optimized searching. without proper index the searching data cannot optimized.