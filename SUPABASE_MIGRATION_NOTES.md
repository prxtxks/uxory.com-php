# Supabase Migration Notes

## Required Configuration in `config/secrets.php`

Add the following Supabase configuration to your `config/secrets.php` file on the server:

```php
<?php
return [
    'recaptcha_secret' => '',
    'gmail_smtp_password' => ' ',
    'hostinger_email_password' => '',
    
    // Database credentials (can be kept for other tables or removed if fully migrated)
    'db_host' => '',
    'db_name' => '',
    'db_user' => '',
    'db_pass' => '',
    
    // Supabase configuration
    'supabase_url' => 'https://rerxfbsxpsnyqdkubqwj.supabase.co',
    'supabase_service_key' => 'YOUR_SERVICE_ROLE_SECRET_KEY_HERE', // IMPORTANT: Use the SERVICE ROLE key (secret), NOT the anon/publishable key. Get from Supabase Dashboard > Settings > API > service_role key
];
```

## Important Notes

1. **Service Role Key**: The `supabase_service_key` MUST be the **Service Role** key (secret key), NOT the anon/publishable key. The service role key bypasses Row Level Security (RLS) which is required for server-side operations. You can find it in Supabase Dashboard > Settings > API > service_role key (keep this secret!).

2. **Supabase Policies**: You have already created an INSERT policy for public subscriptions. For the unsubscribe functionality to work properly, you may also want to create UPDATE and SELECT policies, or rely on the service role key which bypasses RLS.

3. **Status Values**: 
   - `'active'` = subscribed
   - `'inactive'` = unsubscribed

4. **Testing**: After updating `secrets.php`, test both subscribe and unsubscribe functionality to ensure everything works correctly.

## Supabase Table Schema

The migration uses the following table structure:
```sql
create table subscribers (
  id uuid primary key default gen_random_uuid(),
  email text not null unique,
  status text not null default 'active',
  subscribed_at timestamptz default now(),
  unsubscribed_at timestamptz
);
```

## Migration Changes

- **subscribe.php**: Now uses Supabase REST API instead of MySQL PDO
- **unsubscribe-script.php**: Now uses Supabase REST API instead of MySQL mysqli

Both files now:
- Use cURL to interact with Supabase REST API
- Map `status = 'active'` for subscribed users
- Map `status = 'inactive'` for unsubscribed users
- Use ISO 8601 timestamp format for dates
