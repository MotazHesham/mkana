<?php

return [
    'userManagement' => [
        'title' => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title' => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'title' => 'Title',
            'title_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title' => 'المجموعات',
        'title_singular' => 'مجموعة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'title' => 'العنوان',
            'title_helper' => ' ',
            'permissions' => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'user' => [
        'title' => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'email' => 'البريد الإلكتروني',
            'email_helper' => ' ',
            'email_verified_at' => 'تاريخ تأكيد البريد الإلكتروني',
            'email_verified_at_helper' => ' ',
            'password' => 'كلمة المرور',
            'password_helper' => ' ',
            'country' => 'المدينه',
            'country_helper' => ' ',
            'roles' => 'الأدوار',
            'roles_helper' => ' ',
            'approved' => 'تم الموافقه',
            'approved_helper' => ' ',
            'remember_token' => 'رمز التذكير',
            'remember_token_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'user_type' => 'نوع المستخدم',
            'user_type_helper' => ' ',
            'identity'=>'رقم الهوية',
            'commercial_register'=>'رقم السجل التجاري',
        ],
    ],
    'organization' => [
        'title' => 'المؤسسات',
        'title_singular' => 'مؤسسة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'email' => 'البريد الالكتروني',
            'email_helper' => ' ',
            'country' => 'المدينه',
            'country_helper' => ' ',
            'photo' => 'الصورة',
            'photo_helper' => ' ',
            'phone' => 'الهاتف',
            'phone_helper' => ' ',
            'address' => 'العنوان',
            'address_helper' => ' ',
            'store_name' => 'اسم المتجر',
            'store_name_helper' => ' ',
            'description' => 'الوصف',
            'description_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            'featured_store' => 'متجر مميز',
            'featured_store_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'brand_name' => 'البراند',
            'brand_name_helper' => ' ',
        ],
    ],
    'product' => [
        'title' => 'المنتجات',
        'title_singular' => 'منتج',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'current_stock' => 'الكمية بالمخزن',
            'current_stock_helper' => ' ',
            'information' => 'التفاصيل',
            'information_helper' => ' ',
            'most_recent' => 'وصل حديثًا',
            'most_recent_helper' => ' ',
            'discount' => ' التخفيض بالنسبة المئوية',
            'discount_helper' => ' (نسبة الخصم )',
            'price' => 'السعر',
            'price_helper' => ' ',
            'image' => 'الصور',
            'image_helper' => '640x640',
            'product_tags' => 'الكلمات الدالة',
            'product_tags_helper' => ' ',
            'product_offers' => 'العروض',
            'product_offers_helper' => ' ',
            'product_category' => 'الفئة',
            'product_category_helper' => ' ',
            'user' => 'بواسطة',
            'user_helper' => ' ',
            'fav' => 'المفضلة',
            'fav_helper' => ' ',
            'published' => 'نشر',
            'published_helper' => ' ',
            'shipping_method' => 'شحن المنتج بواسطة ',
            'shipping_method_helper' => ' ',
            'weight'=>'وزن المنتج  بالجرامات (إن وجد)',
            'weight_helper'=>'',
            'file'=>'ملف وصف المنتج',
        ],
    ],
    'course' => [
        'title' => 'ورش العمل',
        'title_singular' => 'ورشة عمل',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'اسم الدورة',
            'name_helper' => ' ',
            'description' => 'الوصف',
            'description_helper' => ' ',
            'trainer' => 'اسم المدرب',
            'trainer_helper' => ' ',
            'start_at' => 'تاريخ الدورة',
            'start_at_helper' => ' ',
            'photo' => 'الصورة',
            'photo_helper' => '966x679',
            'price' => 'السعر',
            'courses_hours' => 'الساعات التدريبية',
            'courses_hours_helper' => '',
            'price_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'type' => 'النوع',
            'type_helper' => ' ',
            'approved' => 'نشر ',
            'approved_helper' => ' ',
        ],
    ],
    'tradersForum' => [
        'title' => 'منتدى التجار',
        'title_singular' => 'منتدى التجار',
    ],
    'froum' => [
        'title' => 'المنتديات',
        'title_singular' => 'منتدى',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => '',
            'description' => 'الوصف',
            'description_helper' => ' ',
            'category' => 'الفئة',
            'category_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'post' => [
        'title' => 'المنشورات',
        'title_singular' => 'منشور',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'title' => 'العنوان',
            'title_helper' => ' ',
            'content' => 'المحتوى',
            'content_helper' => ' ',
            'post_forum' => 'فئة المنشور',
            'post_forum_helper' => ' ',
            'author' => 'الناشر',
            'author_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'post_comments' => 'تعليقات المنشور',
            'post_comments_helper' => ' ',
            'photos' => 'الصور',
            'photos_helper' => '966x679',
            'post_tags' => ' الكلمات الداله',
            'post_tags_helper' => ' ',
            'publish' => 'نشر ',
            'publish_helper' => '',
        ],
    ],
    'comment' => [
        'title' => 'التعليقات',
        'title_singular' => 'تعليق',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'comment' => 'التعليق',
            'comment_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'user_comment' => 'تعليق المستخدم',
            'user_comment_helper' => ' ',
            'comment_for' => 'تعليق لصالح',
            'comment_for_helper' => ' ',
        ],
    ],
    'blogsManagment' => [
        'title' => 'إدارة المدونات',
        'title_singular' => 'إدارة المدونات',
    ],
    'blog' => [
        'title' => 'المدونات',
        'title_singular' => 'مدونة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'title' => 'العنوان',
            'title_helper' => ' ',
            'content' => 'المحتوى',
            'content_helper' => ' ',
            'video' => 'الفيديو',
            'video_helper' => ' ',
            'photo' => 'الصورة',
            'photo_helper' => '966x679',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'short_description' => 'الوصف المختصر',
            'short_description_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            'media_url' => 'رابط الميديا',
            'media_url_helper' => ' ',
            'type' => 'النوع',
            'type_helper' => ' ',
            'blog_comments' => 'تعليقات المدونة',
            'blog_comments_helper' => ' ',
            'tags' => 'الكلمات الداله',
            'tags_helper' => ''
        ],
    ],
    'customerService' => [
        'title' => 'خدمة العملاء',
        'title_singular' => 'خدمة العملاء',
    ],
    'message' => [
        'title' => 'الرسائل',
        'title_singular' => 'رسالة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'email' => 'البريد الإلكتروني',
            'email_helper' => ' ',
            'subject' => 'الموضوع',
            'subject_helper' => ' ',
            'message' => 'الرسالة',
            'message_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'generalSetting' => [
        'title' => 'الإعدادات العامة',
        'title_singular' => 'إعداد عام',
    ],
    'slider' => [
        'title' => 'السلايدر',
        'title_singular' => 'سلايدر',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'title' => 'العنوان',
            'title_helper' => ' ',
            'photo' => 'الصورة',
            'photo_helper' => '966x495',
            'status' => 'الحالة',
            'status_helper' => ' ',
            'description' => 'نبذة مختصرة',
            'description_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'banner' => [
        'title' => 'البانر',
        'title_singular' => 'بانر',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'title' => 'العنوان',
            'title_helper' => ' ',
            'banner_photo' => 'صورة البانر',
            'banner_photo_helper' => ' 570  x 320 فقط',
            'active' => 'نشط',
            'active_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'productManagment' => [
        'title' => 'إدارة المنتجات',
        'title_singular' => 'إدارة المنتجات',
    ],
    'category' => [
        'title' => 'التصنيفات',
        'title_singular' => 'تصنيف',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'icon' => 'الأيقونة',
            'icon_helper' => ' ',
            'most_recent' => 'الأحدث',
            'most_recent_helper' => ' ',
            'fav' => 'المفضل',
            'fav_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'seller' => [
        'title' => 'البائعون',
        'title_singular' => 'بائع',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'email' => 'البريد الالكتروني',
            'email_helper' => ' ',
            'country' => 'المدينه',
            'country_helper' => ' ',
            'photo' => 'الصورة',
            'photo_helper' => '260x290',
            'phone' => 'الهاتف',
            'phone_helper' => ' ',
            'address' => 'العنوان',
            'address_helper' => ' ',
            'store_name' => 'اسم المتجر',
            'store_name_helper' => ' ',
            'description' => 'الوصف',
            'description_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            'featured_store' => 'متجر مميز',
            'featured_store_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'brand_name' => 'البراند',
            'brand_name_helper' => ' ',
        ],
    ],
    'tag' => [
        'title' => 'الكلمات الدلالية',
        'title_singular' => 'كلمة دلالية',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الكلمة الدالة',
            'name_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'review' => [
        'title' => 'التقييمات',
        'title_singular' => 'تقييم',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'rating' => 'التقييم',
            'rating_helper' => ' ',
            'comment' => 'التعليق',
            'comment_helper' => ' ',
            'published' => 'منشور',
            'published_helper' => ' ',
            'user_review' => 'تقييم المستخدم',
            'user_review_helper' => ' ',
            'product_review' => 'تقييم المنتج',
            'product_review_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'aboutUs' => [
        'title' => 'من نحن',
        'title_singular' => 'من نحن',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'vision' => 'الرؤية',
            'vision_helper' => ' ',
            'email' => 'البريد الإلكتروني',
            'email_helper' => ' ',
            'phone_number' => 'رقم هاتف 1',
            'phone_number_helper' => ' ',
            'phone_number_2' => 'رقم هاتف 2',
            'phone_number_2_helper' => ' ',
            'logo' => 'الشعار',
            'logo_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'normal_shipment_cost' => 'تكلفة الشحن العادي',
            'normal_shipment_cost_helper' => ' ',
            'fast_shipment_cost' => 'تكلفة الشحن السريع',
            'fast_shipment_cost_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
        ],
    ],
    'orderManagment' => [
        'title' => 'إدارة الطلبات',
        'title_singular' => 'إدارة الطلبات',
    ],
    'order' => [
        'title' => 'الطلبات',
        'title_singular' => 'الطلب',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'order_num' => 'رقم الطلب',
            'order_num_helper' => ' ',
            'client_name' => 'اسم العميل',
            'client_name_helper' => ' ',
            'phone_number' => 'رقم الهاتف',
            'phone_number_helper' => ' ',
            'phone_number_2' => 'رقم هاتف 2',
            'phone_number_2_helper' => ' ',
            'shipping_address' => 'عنوان الشحن',
            'shipping_address_helper' => ' ',
            'delivery_status' => 'حالة التوصيل',
            'delivery_status_helper' => ' ',
            'total_cost' => 'التكلفة الإجمالية',
            'total_cost_helper' => ' ',
            'discount' => 'الخصم',
            'discount_helper' => ' ',
            'shipment_type' => 'نوع الشحن',
            'shipment_type_helper' => ' ',
            'area_code' => 'المنطقة',
            'area_code_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            'city' => 'المدينة',
            'city_helper' => ' ',
        ],
    ],
    'cart' => [
        'title' => 'السلة',
        'title_singular' => 'السلة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            '<product></product>' => 'المنتجات',
            'product_helper' => ' ',
            'price' => 'السعر',
            'price_helper' => ' ',
            'quantity' => 'الكمية',
            'quantity_helper' => ' ',
            'total_cost' => 'التكلفة الإجمالية',
            'total_cost_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'orderProduct' => [
        'title' => 'منتج الطلب',
        'title_singular' => 'منتج الطلب',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'product' => 'المنتج',
            'product_helper' => ' ',
            'user' => 'المستخدم',
            'user_helper' => ' ',
            'price' => 'السعر',
            'price_helper' => ' ',
            'quantity' => 'الكمية',
            'quantity_helper' => ' ',
            'total_cost' => 'التكلفة الإجمالية',
            'total_cost_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'area' => [
        'title' => 'المناطق',
        'title_singular' => 'المنطقة',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'city' => 'المدينة',
            'city_helper' => ' ',
            'shipping_cost' => 'تكلفة الشحن',
            'shipping_cost_helper' => ' ',
            'active_area' => 'المنطقة النشطة',
            'active_area_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title' => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'description' => 'Description',
            'description_helper' => ' ',
            'subject_id' => 'Subject ID',
            'subject_id_helper' => ' ',
            'subject_type' => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id' => 'User ID',
            'user_id_helper' => ' ',
            'properties' => 'Properties',
            'properties_helper' => ' ',
            'host' => 'Host',
            'host_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title' => 'تنبيهات المستخدم',
        'title_singular' => 'تنبيه المستخدم',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'alert_text' => 'نص التنبيه',
            'alert_text_helper' => ' ',
            'alert_link' => 'رابط التنبيه',
            'alert_link_helper' => ' ',
            'user' => 'المستخدمين',
            'user_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
        ],
    ],
    'brand' => [
        'title' => 'العلامات التجارية',
        'title_singular' => 'العلامة التجارية',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'brand_image' => 'الصورة',
            'brand_image_helper' => ' ',
            'brand_information' => 'تفاصيل المتجر',
            'brand_information_helper' => ' ',
            'details' => 'التفاصيل',
            'details_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'offer' => [
        'title' => 'العروض',
        'title_singular' => 'العرض',
        'fields' => [
            'id' => 'id',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'created_at' => 'تاريخ الإنشاء',
            'created_at_helper' => ' ',
            'updated_at' => 'تاريخ التحديث',
            'updated_at_helper' => ' ',
            'deleted_at' => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'customer' => [
        'title' => 'العملاء',
        'title_singular' => 'عميل',
        'fields' => [
            'id' => 'ID',
            'id_helper' => ' ',
            'name' => 'الاسم',
            'name_helper' => ' ',
            'email' => 'البريد الالكتروني ',
            'email_helper' => ' ',
            'password' => 'كلمة المرور',
            'password_helper' => ' ',
            'address' => 'العنوان',
            'address_helper' => ' ',
            'personal_photo' => 'الصوره الشخصيه',
            'personal_photo_helper' => ' ',
            'phone' => 'الهاتف',
            'phone_helper' => ' ',
            'created_at' => 'Created at',
            'created_at_helper' => ' ',
            'updated_at' => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at' => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
