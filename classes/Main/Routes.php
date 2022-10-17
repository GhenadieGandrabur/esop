<?php

namespace Main;

interface Routes
{
    public function getRoutes(): array;
    public function getAuthentication(): \Main\Authentication;
}
