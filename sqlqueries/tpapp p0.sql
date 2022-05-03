
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `steam_id` int(10) UNSIGNED DEFAULT NULL,
  `gog_id` int(10) UNSIGNED DEFAULT NULL,
  `epic_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banned` tinyint(1) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_game_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date_f` date DEFAULT NULL,
  `coming_soon` tinyint(1) DEFAULT NULL,
  `steam_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gog_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metacritic` int(11) DEFAULT NULL,
  `metacritic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendations` int(11) DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL,
  `current_steam_price` int(11) DEFAULT NULL,
  `current_gog_price` int(11) DEFAULT NULL,
  `current_epic_price` int(11) DEFAULT NULL,
  `best_price` int(11) DEFAULT NULL,
  `best_store` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `windows` tinyint(1) DEFAULT NULL,
  `pc_recommended` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pc_minimum` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linux` tinyint(1) DEFAULT NULL,
  `linux_recommended` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linux_minimum` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac` tinyint(1) DEFAULT NULL,
  `mac_recommended` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_minimum` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_credits_definitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_credits_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `credit_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `steam_package_id` int(10) UNSIGNED DEFAULT NULL,
  `option_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_tags_definitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_tags_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `game_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_480p` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user_products_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `games_steam_id_unique` (`steam_id`),
  ADD UNIQUE KEY `games_gog_id_unique` (`gog_id`),
  ADD UNIQUE KEY `games_epic_id_unique` (`epic_id`);

--
-- Indexes for table `game_credits_definitions`
--
ALTER TABLE `game_credits_definitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `game_credits_definitions_name_unique` (`name`);

--
-- Indexes for table `game_credits_mappings`
--
ALTER TABLE `game_credits_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_credits_mappings_game_id_foreign` (`game_id`),
  ADD KEY `game_credits_mappings_credit_id_foreign` (`credit_id`);

--
-- Indexes for table `game_images`
--
ALTER TABLE `game_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_images_game_id_foreign` (`game_id`);

--
-- Indexes for table `game_packages`
--
ALTER TABLE `game_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packages_steam_package_id_unique` (`steam_package_id`),
  ADD KEY `packages_game_id_foreign` (`game_id`);

--
-- Indexes for table `game_tags_definitions`
--
ALTER TABLE `game_tags_definitions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `game_tags_definitions_name_unique` (`name`);

--
-- Indexes for table `game_tags_mappings`
--
ALTER TABLE `game_tags_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_tags_mappings_game_id_foreign` (`game_id`),
  ADD KEY `game_tags_mappings_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `game_videos`
--
ALTER TABLE `game_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_videos_game_id_foreign` (`game_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_products_mappings`
--
ALTER TABLE `user_products_mappings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_products_mappings_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64030;

--
-- AUTO_INCREMENT for table `game_credits_definitions`
--
ALTER TABLE `game_credits_definitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6853;

--
-- AUTO_INCREMENT for table `game_credits_mappings`
--
ALTER TABLE `game_credits_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6853;

--
-- AUTO_INCREMENT for table `game_images`
--
ALTER TABLE `game_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168186;

--
-- AUTO_INCREMENT for table `game_packages`
--
ALTER TABLE `game_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1590;

--
-- AUTO_INCREMENT for table `game_tags_definitions`
--
ALTER TABLE `game_tags_definitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `game_tags_mappings`
--
ALTER TABLE `game_tags_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `game_videos`
--
ALTER TABLE `game_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16955;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_products_mappings`
--
ALTER TABLE `user_products_mappings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_credits_mappings`
--
ALTER TABLE `game_credits_mappings`
  ADD CONSTRAINT `game_credits_mappings_credit_id_foreign` FOREIGN KEY (`credit_id`) REFERENCES `game_credits_definitions` (`id`),
  ADD CONSTRAINT `game_credits_mappings_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `game_images`
--
ALTER TABLE `game_images`
  ADD CONSTRAINT `game_images_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `game_packages`
--
ALTER TABLE `game_packages`
  ADD CONSTRAINT `packages_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `game_tags_mappings`
--
ALTER TABLE `game_tags_mappings`
  ADD CONSTRAINT `game_tags_mappings_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `game_tags_mappings_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `game_tags_definitions` (`id`);

--
-- Constraints for table `game_videos`
--
ALTER TABLE `game_videos`
  ADD CONSTRAINT `game_videos_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `user_products_mappings`
--
ALTER TABLE `user_products_mappings`
  ADD CONSTRAINT `user_products_mappings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;
