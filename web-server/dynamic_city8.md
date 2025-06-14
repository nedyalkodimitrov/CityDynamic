classDiagram
direction BT
class buses {
   varchar(255) name
   varchar(255) model
   varchar(255) seats
   int seats_at_row
   json seats_status
   bigint unsigned company_id
   bigint unsigned current_station_id
   varchar(200) location
   bigint unsigned id
}
class cities {
   varchar(80) name
   bigint unsigned country_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class companies {
   varchar(255) name
   varchar(255) profile_photo
   datetime founded_at
   varchar(255) description
   varchar(255) contact_email
   varchar(255) contact_phone
   varchar(255) contact_address
   timestamp created_at
   timestamp updated_at
   varchar(255) stripe_account_id
   bigint unsigned id
}
class companies_stations {
   bigint unsigned company_id
   bigint unsigned station_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class companies_stations_connection_requests {
   bigint unsigned company_id
   bigint unsigned station_id
   enum('seen', 'approved') status
   enum('from_company', 'from_station') type
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class company_stripe_accounts {
   varchar(255) stripe_account_id
   tinyint(1) is_charges_enabled
   bigint unsigned company_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class countries {
   varchar(255) name
   bigint unsigned id
}
class courses {
   bigint unsigned destination_id
   bigint unsigned bus_id
   bigint unsigned driver_id
   bigint unsigned last_point_id
   decimal(8,2) current_latitude
   decimal(8,2) current_longitude
   date date
   time start_time
   timestamp created_at
   timestamp updated_at
   varchar(10) price
   bigint unsigned id
}
class destination_points {
   bigint unsigned station_id
   bigint unsigned destination_id
   int order
   double price
   double duration
   double distance
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class destination_schedules {
   bigint unsigned destination_id
   double price
   time hour
   bigint unsigned bus_id
   bigint unsigned driver_id
   json week_days
   timestamp created_at
   timestamp updated_at
   date start_date
   date end_date
   bigint unsigned id
}
class destinations {
   varchar(255) name
   bigint unsigned start_station_id
   bigint unsigned end_station_id
   bigint unsigned company_id
   bigint unsigned id
}
class failed_jobs {
   varchar(255) uuid
   text connection
   text queue
   longtext payload
   longtext exception
   timestamp failed_at
   bigint unsigned id
}
class migrations {
   varchar(255) migration
   int batch
   int unsigned id
}
class model_has_permissions {
   bigint unsigned permission_id
   varchar(255) model_type
   bigint unsigned model_id
}
class model_has_roles {
   bigint unsigned role_id
   varchar(255) model_type
   bigint unsigned model_id
}
class orders {
   bigint unsigned user_id
   double total_price
   int ticket_numbers
   varchar(255) stripe_charge_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class password_reset_tokens {
   varchar(255) token
   timestamp created_at
   varchar(255) email
}
class password_resets {
   varchar(255) email
   varchar(255) token
   timestamp created_at
}
class permissions {
   varchar(255) name
   varchar(255) guard_name
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class personal_access_tokens {
   varchar(255) tokenable_type
   bigint unsigned tokenable_id
   varchar(255) name
   varchar(64) token
   text abilities
   timestamp last_used_at
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class role_has_permissions {
   bigint unsigned permission_id
   bigint unsigned role_id
}
class roles {
   varchar(255) name
   varchar(255) guard_name
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class shopping_carts {
   bigint unsigned user_id
   bigint unsigned ticket_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class stations {
   varchar(255) name
   bigint unsigned city_id
   varchar(255) profile_photo
   varchar(255) contact_email
   varchar(255) contact_phone
   varchar(255) contact_address
   timestamp created_at
   timestamp updated_at
   varchar(200) location
   varchar(45) stationscol
   bigint unsigned id
}
class tickets {
   bigint unsigned user_id
   bigint unsigned course_id
   bigint unsigned start_point_id
   bigint unsigned end_point_id
   bigint unsigned order_id
   double price
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class user_workspaces {
   bigint unsigned user_id
   bigint unsigned station_id
   bigint unsigned company_id
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}
class users {
   varchar(255) name
   varchar(255) email
   varchar(255) password
   varchar(100) remember_token
   timestamp created_at
   timestamp updated_at
   bigint unsigned id
}

buses  -->  companies : company_id:id
buses  -->  stations : current_station_id:id
cities  -->  countries : country_id:id
companies_stations  -->  companies : company_id:id
companies_stations  -->  stations : station_id:id
companies_stations_connection_requests  -->  companies : company_id:id
companies_stations_connection_requests  -->  stations : station_id:id
company_stripe_accounts  -->  companies : company_id:id
courses  -->  buses : bus_id:id
courses  -->  destination_points : last_point_id:id
courses  -->  destinations : destination_id:id
courses  -->  users : driver_id:id
destination_points  -->  destinations : destination_id:id
destination_points  -->  stations : station_id:id
destination_schedules  -->  buses : bus_id:id
destination_schedules  -->  destinations : destination_id:id
destination_schedules  -->  users : driver_id:id
destinations  -->  companies : company_id:id
destinations  -->  stations : end_station_id:id
destinations  -->  stations : start_station_id:id
model_has_permissions  -->  permissions : permission_id:id
model_has_roles  -->  roles : role_id:id
orders  -->  users : user_id:id
role_has_permissions  -->  permissions : permission_id:id
role_has_permissions  -->  roles : role_id:id
shopping_carts  -->  tickets : ticket_id:id
shopping_carts  -->  users : user_id:id
stations  -->  cities : city_id:id
tickets  -->  courses : course_id:id
tickets  -->  destination_points : start_point_id:id
tickets  -->  destination_points : end_point_id:id
tickets  -->  orders : order_id:id
tickets  -->  users : user_id:id
user_workspaces  -->  companies : company_id:id
user_workspaces  -->  stations : station_id:id
user_workspaces  -->  users : user_id:id
