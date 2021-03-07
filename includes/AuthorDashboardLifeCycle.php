<?php

class AuthorDashboardLifeCycle {
    public static function activate() {
        flush_rewrite_rules();
    }   
    
    public static function deactivate() {
        flush_rewrite_rules();
    }
}