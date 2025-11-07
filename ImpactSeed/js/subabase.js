

const SUPABASE_URL = "https://ugwmbfnjhbpvvgyexyun.supabase.co";
const SUPABASE_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InVnd21iZm5qaGJwdnZneWV4eXVuIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTcxMDY3NDAsImV4cCI6MjA3MjY4Mjc0MH0.iVdBUJht4lkoE7Tf4c_Csn7naIGttSX4yXKXH2QzM8k";

const supabase = window.supabase.createClient(SUPABASE_URL, SUPABASE_KEY);

window.supabase = supabase;