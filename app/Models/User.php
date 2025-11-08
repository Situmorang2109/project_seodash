public function profile()
{
    return $this->hasOne(Profile::class);
}

public function userTransactions()
{
    return $this->hasMany(UserTransaction::class);
}
