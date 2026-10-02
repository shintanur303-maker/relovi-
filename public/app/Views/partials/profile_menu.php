<?php
$currentUser = $currentUser ?? null;
?>

<style>
    .profile-menu-link {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: inherit;
    }

    .profile-menu-avatar {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #D8D8D8;
        background: #EAEAEA;
        flex-shrink: 0;
    }

    .profile-menu-placeholder {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: #E8E8E8;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #777;
        font-size: 14px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .profile-menu-name {
        font-size: 14px;
        font-weight: 500;
        color: #333333;
        max-width: 120px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

<a href="/akun" class="profile-menu-link">

    <?php if (! empty($currentUser['avatar'])): ?>

        <img
            src="/uploads/avatars/<?= esc($currentUser['avatar']) ?>"
            alt="Foto Profil"
            class="profile-menu-avatar"
        >

    <?php else: ?>

        <div class="profile-menu-placeholder">
            <?= esc(strtoupper(substr($currentUser['name'] ?? 'U', 0, 1))) ?>
        </div>

    <?php endif; ?>

    <span class="profile-menu-name">
        <?= esc($currentUser['name'] ?? 'Akun') ?>
    </span>

</a>