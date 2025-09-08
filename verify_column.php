<?php

use Illuminate\Support\Facades\Schema;

if (Schema::hasColumn('profiles', 'logo_text')) {
    echo "VERIFIED: Column 'logo_text' exists.\n";
} else {
    echo "FAILED: Column 'logo_text' does not exist.\n";
}
