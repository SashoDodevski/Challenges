CREATE TABLE business_types (
    id INT AUTO_INCREMENT,
    type VARCHAR(32),

    CONSTRAINT PRIMARY KEY(id)
);

CREATE TABLE users_info (
    id INT AUTO_INCREMENT,
    short_info VARCHAR(256),
    phone VARCHAR(32),
    location VARCHAR(128),
    full_info TEXT,
    business_type_id INT,
    
    CONSTRAINT PRIMARY KEY(id),
    CONSTRAINT FOREIGN KEY(business_type_id) REFERENCES business_types(id)
);

CREATE TABLE user_banners (
    user_id INT,
    cover_img_url TEXT,
    main_title VARCHAR(256),
    subtitle VARCHAR(256),
    
    CONSTRAINT FOREIGN KEY(user_id) REFERENCES users_info(id) ON DELETE CASCADE
);

CREATE TABLE social_networks (
    user_id INT,
    linked_in TEXT,
    facebook TEXT,
    twitter TEXT,
    instagram TEXT,

	CONSTRAINT FOREIGN KEY(user_id) REFERENCES users_info(id) ON DELETE CASCADE
);

CREATE TABLE business_descriptions (
    user_id INT,
    image_url_1 TEXT,
    business_1_description VARCHAR(1024),
    image_url_2 TEXT,
    business_2_description VARCHAR(1024),
    image_url_3 TEXT,
    business_3_description VARCHAR(1024),

    CONSTRAINT FOREIGN KEY(user_id) REFERENCES users_info(id) ON DELETE CASCADE
);

SELECT users_info.id, users_info.short_info, users_info.phone, users_info.location, users_info.full_info, business_types.type, user_banners.cover_img_url, user_banners.main_title, user_banners.subtitle, business_descriptions.image_url_1, business_descriptions.business_1_description, business_descriptions.image_url_2, business_descriptions.business_2_description, business_descriptions.image_url_3, business_descriptions.business_3_description, social_networks.linked_in, social_networks.facebook, social_networks.twitter, social_networks.instagram
FROM users_info 
JOIN business_types ON business_types.id = users_info.business_type_id
JOIN user_banners ON user_banners.user_id = users_info.id
JOIN business_descriptions ON business_descriptions.user_id = users_info.id
JOIN social_networks ON social_networks.user_id = users_info.id
