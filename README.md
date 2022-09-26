# Blog Manager

Magento2 Blog module installation is very easy, please follow the steps for installation-

### Steps to install the module

### Run the Following Command via terminal
-----------------------------------

```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento c:f
```
now module is properly installed

-----------------------------------

### User Guide

### Steps to configure the module

1. Navigate to Blog Manager -> Configuration 
2. Select Abhay-> Blog -> General Settings
3. Module Enable -> Select Enable 
4. Click on the Save Config Button

Please check the attached screenshot for the same

<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/192288686-c20ff84a-8cb5-4a91-9b38-3cdb81a7a5b5.png">


***
Grid Image

<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/191975367-36627abf-2e0e-462e-a4ba-69e49d2646c2.png">

***
UI component Form
<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/191975940-97e92f11-2c79-4b80-82f7-6505602b92e0.png">
<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/191976192-1d0ad0a8-844a-42fb-874f-0d98dfc7230c.png">

-----------------------------
# GraphQL
To fetch the system configuration value using graphql, Please run the following query in the POSTMAN

```
{
  storeConfig{
    abhay_general_enable
  }
}
```
also check the attached screenshot for the same
<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/192291083-205e0ba7-5aa2-4c18-9932-b923fd5d41f1.png">

------------------------------

```
{
    blogData(blog_id: 14){
        blog_id
        blog_title
        author_name
        status
        content
        thumbnail
        url_key
        category_id
        publish_date
        created_at
        updated_at
    }
}
```
<img width="953" alt="image" src="https://user-images.githubusercontent.com/39663362/192293242-6a2c90be-37e2-4f01-a77e-9ad809e3b02d.png">

----------------------------------------



